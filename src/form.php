<?php
namespace Antispam;

class Form
{
    private $fieldEmail;
    private $fieldName;
    private $fieldComment;
    private $fieldHidden;

    public function __construct()
    {
        // pass
    }

    public function setFieldEmail(string $value): self
    {
        $this->fieldEmail = $value;
        return $this;
    }

    public function setFieldName(string $value): self
    {
        $this->fieldName = $value;
        return $this;
    }

    public function setFieldComment(string $value): self
    {
        $this->fieldComment = $value;
        return $this;
    }

    public function setFieldHidden(string $value): self
    {
        $this->fieldHidden = $value;
        return $this;
    }

    public function getFieldEmail()
    {
        return $this->fieldEmail;
    }

    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function getFieldComment()
    {
        return $this->fieldComment;
    }

    public function getFieldHidden()
    {
        return $this->fieldHidden;
    }

}
