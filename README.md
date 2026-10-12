# webservco/discogs-examples

A PHP web application built on [webservco/framework](https://github.com/webservco/framework).

Web pages that call the Discogs API through `webservco/discogs-api` and `webservco/discogs-auth`, one page per implemented endpoint plus a form for custom calls.

> **Note:** Not maintained since 2022. It still requires PHP 7.4, while the current versions of the libraries it uses require PHP 8.3. It's still useful as a reference for wiring the libraries together.

- Requires: PHP 7.4, Node.js (to build the CSS and JavaScript), a Discogs account
- Related: `webservco/discogs-api`, `webservco/discogs-auth`, `webservco/api`

---

## Installation

```shell
git clone https://github.com/webservco/discogs-examples.git
cd discogs-examples
composer install
npm install
cp config/.env.ini.dist config/.env.ini
# Generate public/assets/css/styles.min.css and public/assets/js/scripts.min.js.
npm run build
```

Point the web server at the `public` directory. Its `.htaccess` file sends every request that isn't an existing file to `index.php`. Set up the HTTPS redirect in the virtual host.

---

## Usage

| Menu | Page | Calls |
| --- | --- | --- |
| OAuth | `Oauth/requestToken` | Step 2: `GET oauth/request_token` |
| OAuth | `Oauth/redirect` | Step 3: sends you to Discogs to authorize the app |
| OAuth | `Oauth/callback` | Step 3: shows the token and verifier Discogs sent back |
| OAuth | `Oauth/accessToken` | Step 4: `POST oauth/access_token` |
| OAuth | `Oauth/identity` | Step 5: `GET oauth/identity` |
| User Identity | `UserIdentity/profile` | `GET users/{username}` |
| User Collection | `UserCollection/fields` | `GET users/{username}/collection/fields` |
| User Collection | `UserCollection/value` | `GET users/{username}/collection/value` |
| Custom API call | `Api/custom` | Any endpoint, `GET` or `POST` |

Each page shows the endpoint, method, status, error message and decoded data. The client is built in [src/Traits/DiscogsApiTrait.php](src/Traits/DiscogsApiTrait.php).

For the OAuth flow, copy the values each step returns into `config/.env.ini` before moving to the next step. The `webservco/discogs-auth` README describes the steps.

---

## Configuration

Keys read from `config/.env.ini`, under `[Discogs API]`:

```ini
; Authorization type: app, oauth or user.
app_discogs_auth_type = user

; Type "app".
app_discogs_consumer_key = 'key'
app_discogs_consumer_secret = 'secret'

; Type "oauth", filled in during the OAuth flow.
app_discogs_oauth_flow_callback = https://discogs.examples/Oauth/callback
app_discogs_oauth_flow_token =
app_discogs_oauth_flow_token_secret =
app_discogs_oauth_flow_verifier =
app_discogs_oauth_token =
app_discogs_oauth_token_secret =

; Type "user".
app_discogs_user_personal_access_token = 'token'

app_discogs_settings_debug = true
app_discogs_settings_rate_limiting = true
app_discogs_settings_user_agent = 'ExampleApp/1.0'

; Used by the User Identity and User Collection pages.
app_discogs_misc_username = 'example_user'
```

The `[Email]` and `[Database]` sections are left over from the project template. No page uses them.

---

## Notes

To change the layout, edit the files in `resources/scss` and `resources/javascript`. `npm run devel` serves `resources/layout` with live reload. `npm run build` regenerates the files in `public/assets`, so don't edit those by hand.

The CLI entry point is `bin/cli App/home` (alias `bin/cli dashboard`). All it does is print "Hello World!".

---

## Documentation

- [Usage](docs/Usage.md): Web and CLI entry points.
- [Layout](docs/Layout.md): Editing and building the CSS and JavaScript.

---

## Development

```shell
# Code style.
composer check
# Static analysis, level 5 to 8.
composer s:5
# Unit tests.
composer test:d
# Lint, code style, static analysis and tests.
composer all
```

---

## License

[MIT](LICENSE)
