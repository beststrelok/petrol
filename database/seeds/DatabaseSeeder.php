<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	public function run() {
		// Model::unguard();

		$this->call('PetrolSeeder');
		$this->call('RegionSeeder');
		$this->call('QuotationSeeder');
	}
}

// use Faker\Factory as Faker;
// $faker = Faker::create();

// // PERSON
// $faker->name
// $faker->address
// $faker->text
// $faker->randomDigit             // 7
// $faker->randomDigitNotNull      // 5
// $faker->randomNumber($nbDigits = NULL) // 79907610
// $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
// $faker->numberBetween($min = 1000, $max = 9000) // 8567
// $faker->randomLetter            // 'b'
// $faker->randomElements($array = array ('a','b','c'), $count = 1) // array('c')
// $faker->randomElement($array = array ('a','b','c')) // 'b'
// $faker->shuffle('hello, world') // 'rlo,h eoldlw'
// $faker->shuffle(array(1, 2, 3)) // array(2, 1, 3)
// $faker->numerify('Hello ###') // 'Hello 609'
// $faker->lexify('Hello ???') // 'Hello wgt'
// $faker->bothify('Hello ##??') // 'Hello 42jz'
// $faker->asciify('Hello ***') // 'Hello R6+'
// $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'); // sm0@y8k96a.ej

// $faker->word                    // 'aut'
// $faker->words($nb = 3)          // array('porro', 'sed', 'magni')
// $faker->sentence($nbWords = 6)  // 'Sit vitae voluptas sint non voluptates.'
// $faker->sentences($nb = 3)      // array('Optio quos qui illo error.', 'Laborum vero a officia id corporis.', 'Saepe provident esse hic eligendi.')
// $faker->paragraph($nbSentences = 3) // 'Ut ab voluptas sed a nam. Sint autem inventore aut officia aut aut blanditiis. Ducimus eos odit amet et est ut eum.'
// $faker->paragraphs($nb = 3)     // array('Quidem ut sunt et quidem est accusamus aut. Fuga est placeat rerum ut. Enim ex eveniet facere sunt.', 'Aut nam et eum architecto fugit repellendus illo. Qui ex esse veritatis.', 'Possimus omnis aut incidunt sunt. Asperiores incidunt iure sequi cum culpa rem. Rerum exercitationem est rem.')
// $faker->text($maxNbChars = 200) // 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'

// $faker->title($gender = null|'male'|'female')     // 'Ms.'
// $faker->titleMale                                 // 'Mr.'
// $faker->titleFemale                               // 'Ms.'
// $faker->suffix                                    // 'Jr.'
// $faker->name($gender = null|'male'|'female')      // 'Dr. Zane Stroman'
// $faker->firstName($gender = null|'male'|'female') // 'Maynard'
// $faker->firstNameMale                             // 'Maynard'
// $faker->firstNameFemale                           // 'Rachel'
// $faker->lastName                                  // 'Zulauf'

// // ADDRESS
// $faker->cityPrefix              // 'Lake'
// $faker->secondaryAddress        // 'Suite 961'
// $faker->state                   // 'NewMexico'
// $faker->stateAbbr               // 'OH'
// $faker->citySuffix              // 'borough'
// $faker->streetSuffix            // 'Keys'
// $faker->buildingNumber          // '484'
// $faker->city                    // 'West Judge'
// $faker->streetName              // 'Keegan Trail'
// $faker->streetAddress           // '439 Karley Loaf Suite 897'
// $faker->postcode                // '17916'
// $faker->address                 // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
// $faker->country                 // 'Falkland Islands (Malvinas)'
// $faker->latitude                // 77.147489
// $faker->longitude               // 86.211205

// $faker->phoneNumber             // '132-149-0269x3767'

// $faker->catchPhrase             // 'Monitored regional contingency'
// $faker->bs                      // 'e-enable robust architectures'
// $faker->company                 // 'Bogan-Treutel'
// $faker->companySuffix           // 'and Sons'

// // DATETIME
// $faker->unixTime($max = 'now')                // 58781813
// $faker->dateTime($max = 'now')                // DateTime('2008-04-25 08:37:17')
// $faker->dateTimeAD($max = 'now')              // DateTime('1800-04-29 20:38:49')
// $faker->iso8601($max = 'now')                 // '1978-12-09T10:10:29+0000'
// $faker->date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
// $faker->time($format = 'H:i:s', $max = 'now') // '20:49:42'
// $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now') // DateTime('2003-03-15 02:00:49')
// $faker->dateTimeThisCentury($max = 'now')     // DateTime('1915-05-30 19:28:21')
// $faker->dateTimeThisDecade($max = 'now')      // DateTime('2007-05-29 22:30:48')
// $faker->dateTimeThisYear($max = 'now')        // DateTime('2011-02-27 20:52:14')
// $faker->dateTimeThisMonth($max = 'now')       // DateTime('2011-10-23 13:46:23')
// $faker->amPm($max = 'now')                    // 'pm'
// $faker->dayOfMonth($max = 'now')              // '04'
// $faker->dayOfWeek($max = 'now')               // 'Friday'
// $faker->month($max = 'now')                   // '06'
// $faker->monthName($max = 'now')               // 'January'
// $faker->year($max = 'now')                    // '1993'
// $faker->century                               // 'VI'
// $faker->timezone                              // 'Europe/Paris'

// // INTERNET
// $faker->email                   // 'tkshlerin@collins.com'
// $faker->safeEmail               // 'king.alford@example.org'
// $faker->freeEmail               // 'bradley72@gmail.com'
// $faker->companyEmail            // 'russel.durward@mcdermott.org'
// $faker->freeEmailDomain         // 'yahoo.com'
// $faker->safeEmailDomain         // 'example.org'
// $faker->userName                // 'wade55'
// $faker->password                // 'k&|X+a45*2['
// $faker->domainName              // 'wolffdeckow.net'
// $faker->domainWord              // 'feeney'
// $faker->tld                     // 'biz'
// $faker->url                     // 'http://www.skilesdonnelly.biz/aut-accusantium-ut-architecto-sit-et.html'
// $faker->slug                    // 'aut-repellat-commodi-vel-itaque-nihil-id-saepe-nostrum'
// $faker->ipv4                    // '109.133.32.252'
// $faker->localIpv4               // '10.242.58.8'
// $faker->ipv6                    // '8e65:933d:22ee:a232:f1c1:2741:1f10:117c'
// $faker->macAddress              // '43:85:B7:08:10:CA'

// // COLOR
// $faker->hexcolor               // '#fa3cc2'
// $faker->rgbcolor               // '0,255,122'
// $faker->rgbColorAsArray        // array(0,255,122)
// $faker->rgbCssColor            // 'rgb(0,255,122)'
// $faker->safeColorName          // 'fuchsia'
// $faker->colorName              // 'Gainsbor'

// // FILE
// $faker->fileExtension          // 'avi'
// $faker->mimeType               // 'video/x-msvideo'
// // Copy a random file from the source to the target directory and returns the fullpath or filename
// $faker->file($sourceDir = '/tmp', $targetDir = '/tmp') // '/path/to/targetDir/13b73edae8443990be1aa8f1a483bc27.jpg'
// $faker->file($sourceDir, $targetDir, false) // '13b73edae8443990be1aa8f1a483bc27.jpg'

// // IMAGE
// // Image generation provided by LoremPixel (http://lorempixel.com/)
// $faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/'
// $faker->imageUrl($width, $height, 'cats')     // 'http://lorempixel.com/800/600/cats/'
// $faker->imageUrl($width, $height, 'cats', true, 'Faker') // 'http://lorempixel.com/800/400/cats/Faker'
// $faker->image($dir = '/tmp', $width = 640, $height = 480) // '/tmp/13b73edae8443990be1aa8f1a483bc27.jpg'
// $faker->image($dir, $width, $height, 'cats')  // 'tmp/13b73edae8443990be1aa8f1a483bc27.jpg' it's a cat!
// $faker->image($dir, $width, $height, 'cats', true, 'Faker') // 'tmp/13b73edae8443990be1aa8f1a483bc27.jpg' it's a cat with Faker text

// // UUID
// $faker->uuid                   // '7e57d004-2b97-0e7a-b45f-5387367791cd'
// $faker->ean13          // '4006381333931'
// $faker->ean8           // '73513537'
// $faker->isbn13         // '9790404436093'
// $faker->isbn10         // '4881416324'

// // HASH
// $faker->boolean($chanceOfGettingTrue = 50) // true
// $faker->md5           // 'de99a620c50f2990e87144735cd357e7'
// $faker->sha1          // 'f08e7f04ca1a413807ebc47551a40a20a0b4de5c'
// $faker->sha256        // '0061e4c60dac5c1d82db0135a42e00c89ae3a333e7c26485321f24348c7e98a5'

// // LOCALE
// $faker->locale        // en_UK
// $faker->countryCode   // UK
// $faker->languageCode  // en
// $faker->currencyCode  // EUR

// // get a random number between 10 and 20,
// // with more chances to be close to 20
// $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt')

// /*------------------------------------------------
// | MODIFIERS
// ------------------------------------------------*/
// $faker->unique()->randomDigit;
// $faker->optional($weight = 0.1, $default = 'abc')->randomDigit; // 90% chance of NULL