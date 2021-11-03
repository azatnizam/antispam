<?php
namespace Antispam\Rule;

class Url implements IRule
{
    private $form;

    public function setForm(\Antispam\Form $form): self
    {
        $this->form = $form;
        return $this;
    }

    public function check(): bool
    {
        $ruleStatus = 
            strpos($this->form->getFieldComment(), "http") !== false
            || strpos($this->form->getFieldComment(), "https") !== false
        ;

        return $ruleStatus;
    }
}