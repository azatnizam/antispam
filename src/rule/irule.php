<?php
namespace Antispam\Rule;

interface IRule
{
    public function setForm(\Antispam\Form $form);

    public function check(): bool;
}