<?php
namespace Antispam;

/**
 * Engine
 */
class Core
{
    private $rules = [];
    private $detectedTraits = [];
    private $form;
    
    /**
     * Form is object to spam checking
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function detect(): bool
    {
        $this->detectedTraits = [];

        foreach ($this->rules as $rule) {
            $rule->setForm($this->form);

            if ($rule->check()) {
                $this->detectedTraits[] = get_class($rule);
            }
        }

        return !empty($this->detectedTraits);
    }

    public function setRule(Rule\IRule $rule): self
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function reset(): self
    {
        $this->rules = [];
        $this->detectedTraits = [];
        return $this;
    }

    public function getSpamTraits()
    {
        return implode(', ', $this->detectedTraits);
    }
}