<?php
require_once __DIR__ . '/vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

class translate extends Script
{
	protected $helpMessage = "'translate from LANGUAGECODE to LANGUAGECODE STRING'\n"
							."'translate from LANGUAGECODE to LANGUAGECODE STRING'\n"
							."'tr LANGUAGECODE - LANGUAGECODE STRING'\n"
							."You can use 'AUTO' as LANGUAGECODE to detect the language of the given string.";
	protected $description = 'Translates a given string';

	public function run()
	{
		$tr = new TranslateClient($this->matches[1], $this->matches[2]);

		$translatedText = $tr->translate($this->matches[3]);

		if($this->matches[1] === 'AUTO') {
			$this->send('You are translating from ' . $tr->getLastDetectedSource());
		}

		return $this->send($translatedText);
	}
}
