<?php

declare(strict_types=1);

namespace Project;

abstract class AbstractForm extends \WebServCo\Framework\AbstractForm
{

    protected function filter(): bool
    {
        foreach ($this->setting('trim', []) as $item) {
            $this->setData($item, \trim($this->data($item)));
        }
        foreach ($this->setting('filterNumeric', []) as $item) {
            $this->setData($item, \preg_replace('/[^0-9]/', '', $this->data($item)));
        }
        return true;
    }

    protected function validate(): bool
    {
        foreach ($this->setting('required', []) as $item) {
            if (!empty($this->data($item))) {
                continue;
            }

            $this->errors[$item][] = \sprintf(
                'This field is required: %s',
                $this->setting(\sprintf('meta/%s', $item)),
            );
        }
        if (!empty($this->errors)) {
            return false;
        }

        return true;
    }
}
