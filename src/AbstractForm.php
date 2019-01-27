<?php
namespace Project;

abstract class AbstractForm extends \WebServCo\Framework\AbstractForm
{
    protected function filter()
    {
        foreach ($this->setting('trim', []) as $item) {
            $this->setData($item, trim($this->data($item)));
        }
        foreach ($this->setting('filterNumeric', []) as $item) {
            $this->setData($item, preg_replace('/[^0-9]/', '', $this->data($item)));
        }
        return true;
    }

    protected function validate()
    {
        foreach ($this->setting('required', []) as $item) {
            if (empty($this->data($item))) {
                $this->errors[$item][] = sprintf(
                    'This field is required: %s',
                    $this->setting(sprintf('meta/%s', $item))
                );
            }
        }
    }
}
