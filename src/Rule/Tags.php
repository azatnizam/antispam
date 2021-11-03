<?php
namespace Azatnizam\Antispam\Rule;

class Tags implements IRule
{
    private $form;

    public function setForm(\Azatnizam\Antispam\Form $form): self
    {
        $this->form = $form;
        return $this;
    }

    public function check(): bool
    {
        $formText = $this->form->getFieldComment();
        return ($formText != strip_tags($formText));
    }
}
