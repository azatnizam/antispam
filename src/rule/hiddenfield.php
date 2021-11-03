<?php
namespace Azatnizam\Antispam\Rule;

class HiddenField implements IRule
{
    private $form;

    public function setForm(\Antispam\Form $form): self
    {
        $this->form = $form;
        return $this;
    }

    public function check(): bool
    {
        return !empty($this->form->getFieldHidden());
    }
}
