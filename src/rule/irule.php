<?php
namespace Azatnizam\Antispam\Rule;

interface IRule
{
    public function setForm(\Azatnizam\Antispam\Form $form);

    public function check(): bool;
}
