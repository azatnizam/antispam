<?php
namespace Antispam;

/**
 * Monitoring spam level
 */
class Logger
{
    private const LOG_DIR = '';
    private $fileName;
    private $spamTraits = '';
    
    function __construct()
    {
        $this->fileName = $_SERVER['HTTP_HOST'] . '.spam.log';
    }

    private function getFile(): string
    {
        return self::LOG_DIR . $this->fileName;
    }

    public function setSpamTraits(string $traits): self
    {
        if ($this->spamTraits) {
            $this->spamTraits .= ', ' . $traits;
        } else {
            $this->spamTraits .= $traits;
        }

        return $this;
    }

    public function add(string $event): void
    {
        $logLine = '[' . (new \DateTime())->format('Y-m-d H:i:s') . '] ';
        $logLine .= '[spam traits: ' . $this->spamTraits . '] ';
        $logLine .= $event;
        $logLine .= "\n\r";
        file_put_contents($this->getFile(), $logLine, FILE_APPEND);
    }
}
