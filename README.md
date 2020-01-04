## Welcome to the telegram wiki!

This package will help you simplify your work with Telegram Api.

![Telegram Api package](https://24betting.ru/upload/medialibrary/2bc/telegram_bot_min.jpg)

## Installation

Installation takes place in the console using the command:

`
composer require elwahab/telegram
`

It may be noted that you must have a composer.

## How I can use this? Quick start
After installing the package, you just need to connect the packages as follows
```
<?php

use ELWAHAB\Telegram;


$telegram = new Telegram(BOT_TOKEN);

$telegram->sendMessage(CHAT_ID, 'Message');

```

## What method can I use?

### sendMessage
Method for send message to your peer. This method get paraments:
* **chat_id**      _integer | id user what get message_;
* **text _string** | message to chat_id_;
* **markdown** _**option**_ _string | Send message with `markdown` or `html`_ (Default null, but if you want use markdown, you should input `markdown` or `html`).


You get result from this method:
**result** _json from Telegram API_

### forwardMessage
Method for forwardMessage from one chat to other chat. 
Params:
chat_id integer | id chat where you want send message
* **from_chat_id** _integer | id chat where you get message to send_
* **message_id** _integer | id message what you want send_

You get result from this method:
**result** _json from Telegram API_

### deleteMessage
Method for delete message from chat. 
Params:
* **chat_id** _integer | id chat where you want delete message_
* **message_id** _integer | id message what you want delete_

### sendPhoto
Method for send photo in chat.
Params:
* **chat_id** _integer | id chat where you want send photo_
* **path** _string | path to photo what you want send_

You get result from this method:
**result** _json from Telegram API_

### sendMessageParams (customer, for send message)
Function for sending telegram messages by bot, customer params send.
Params:
* **params** _array | array with field to send message_  

```
$telegram = new Telegram(BOT_TOKEN);
   
 $params = [
          'chat_id'   => PEER,
          'text'      => 'Message'
      ];

$telegram->sendMessageParams($params);

```

### answerCallbackQuery

Method for answer callback query.
Params:
* **params** _array | array with field to send callback_ 
Params can be this array:
```

$telegram = new Telegram(BOT_TOKEN);
   
      $params = [
          'callback_query_id'     => $callback_id, // id callback for answer
          'text'                  => $answer // text answer
       ];

$telegram->answerCallbackQuery($params);

```
