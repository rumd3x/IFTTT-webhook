# IFTTT-webhook
Adapter for IFTTT webhook service.

This library is in compliance with Rumd3x Standards for notification services.

## Install
```
composer require rumd3x/ifttt-webhook
```

## Usage
```php
<?php
require 'vendor/autoload.php';

use Rumd3x\IFTTT\Event;
use Rumd3x\IFTTT\Trigger;

/**
 * Create event object passing the name of the
 * event, like "button_pressed" or "front_door_opened"
 *
 * With an optional JSON body of:
 * { "value1" : "", "value2" : "", "value3" : "" }
 *
 * The data is completely optional, and you can also
 * This content will be passed on to the Action in your Recipe.
 *
 * Use Any of the syntaxes below:
**/
$event = new Event('event_name');

$event->withValue1('value1')->withValue2('value2')->withValue3('value3');

$event = $event->withValue2('value2');
$event->withValue3('value3');
$event->withValue1('value1');

/**
 * Create the trigger object by passing your IFTTT Webhook Key.
 *
 * And then call the notify method passing the event
 * object to the trigger object and get the response.
 *
 * You can optinally add a delay number in seconds
 * before the request is made
 *
 * Use any of the syntaxes below:
**/
$trigger = new Trigger('your-webhook-key');

$response = $trigger->notify($event);

$response = $trigger->withDelay(10)->notify($event);

$trigger->withDelay(10);
$response = $trigger->notify($event);

$trigger = $trigger->withDelay(10);
$response = $trigger->notify($event);
```
