<?php

declare(strict_types=1);

namespace Project;

abstract class AbstractForm extends \WebServCo\Framework\AbstractForm
{

    protected function filter(): bool
    {
        foreach ($this->setting('trim', []) as $item) {
            $this->setData($item, \trim((string) $this->data($item)));
        }
        foreach ($this->setting('filterNumeric', []) as $item) {
            if ('' === $this->data($item)) {
                continue;
            }

            $this->setData($item, \floatval(\preg_replace('/[^0-9]/', '', $this->data($item))));
        }
        foreach ($this->setting('numberFix', []) as $item) {
            if ('' === $this->data($item)) {
                continue;
            }

            $this->setData($item, \floatval(\str_replace(',', '.', $this->data($item))) ?? '');
        }
        return true;
    }

    protected function validate(): bool
    {
        foreach ($this->setting('required', []) as $item) {
            if (!empty($this->data($item))) {
                continue;
            }

            $this->errors[$item][] = \sprintf(\__('This field is mandatory: %s'), $this->setting('meta/' . $item));
        }
        foreach ($this->setting('minimumLength', []) as $item => $minimumLength) {
            if (\mb_strlen($this->data($item)) >= $minimumLength) {
                continue;
            }

            $this->errors[$item][] = \sprintf(
                \__('This field is too short: %s'),
                $this->setting('meta/' . $item),
            );
        }
        if (!empty($this->errors)) {
            return false;
        }

        return true;
    }
}
