# Antispam

## Usage

```php
// Antispam client
use Azatnizam\Antispam;

$logger = new Antispam\Logger();

// Web-form emulator
$defendForm = new Antispam\Form();
$defendForm
    ->setFieldEmail('bot@gmail.com')
    ->setFieldName('Robert')
    ->setFieldComment('Bot sending spam <a href="http://site.com">site.com</a>')
    ->setFieldHidden('bot@gmail.com')
;

$antispam = new Antispam\Core($defendForm);
$antispam
    ->setRule(new Antispam\Rule\Url())
    ->setRule(new Antispam\Rule\HiddenField())
    ->setRule(new Antispam\Rule\Tags())
;

$isSpamDetected = $antispam->detect();

$logger
    ->setSpamTraits($antispam->getSpamTraits())
    ->add(json_encode([
        'name' => $defendForm->getFieldName(),
        'email' => $defendForm->getFieldEmail(),
        'hidden' => $defendForm->getFieldHidden(),
        'comment' => $defendForm->getFieldComment(),
    ]))
;
```

## Rules
Detecting spam traits. You may add own detecting traits. For this purpose create new Rule file and implement `Azatnizam\Antispam\Rule\IRule`.
