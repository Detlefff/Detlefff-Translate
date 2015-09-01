<?php
require_once __DIR__ . '/vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

class translate extends Script
{
	public function run()
	{
		$tr = new TranslateClient($this->matches[1], $this->matches[2]);

		$translatedText = $tr->translate($this->matches[3]);

		if(!isset($this->matches[1])) {
			$this->send('You are translating from ' . $tr->getLastDetectedSource());
		}

		return $this->send($translatedText);
	}
}
