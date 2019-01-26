# OAuth Flow

https://www.discogs.com/developers/#page:authentication

---

## Step 2
`Oauth/requestToken`

Note `oauth_token` and `oauth_token_secret`, add to Discogs configuration array, `api/oauth/flow`.

---

## Step 3

`Oauth/redirect`
Redirects user to `https://discogs.com/oauth/authorize?oauth_token=<oauth_token>`

After authorization, you will be redirected to the callback url: `Oauth/callback`.

### Authorized
Receive: `oauth_token` (from step 2), `oauth_verifier`.

Note: `oauth_verifier`, add to Discogs configuration array, `api/oauth/flow`.

### Denied
Receive: `denied` (oauth token from step 2)

---

## Step 4

`Oauth/accessToken`

Note `oauth_token` and `oauth_token_secret`, add to Discogs configuration array, `api/oauth/access`.


---

## Step 5

`Oauth/identity`

Verify.
