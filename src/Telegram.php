<?php

namespace ELWAHAB;

use ELWAHAB\BaseTelegram;

class Telegram extends BaseTelegram
{

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Function for sending telegram messages by bot
     *
     * @param     chat_id number | id user what get message
     * @param     text string | message to chat_id
     * @param     markdown string | markdown or html
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function sendMessage($chat_id, $text, $markdown = null)
    {
        $typeMethod = 'sendMessage';

        $params = [
            'chat_id'   => $chat_id,
            'text'      => $text
        ];

        if (!empty($markdown)) {
            if (strpos($markdown, 'markdown') !== false) {
                $params['parse_mode'] = 'Markdown';
            }elseif (strpos($markdown, 'html') !== false) {
                $params['parse_mode'] = 'HTML';
            }
        }

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * For forwardMessage from one chat to other chat
     *
     * @param     chat_id integer | id chat where you want send message
     * @param     from_chat_id integer | id chat where you get message to send
     * @param     message_id integer | id message what you want send
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function forwardMessage($chat_id, $from_chat_id, $message_id)
    {
        $typeMethod = 'forwardMessage';

        $params = [
            'chat_id'       => $chat_id,
            'from_chat_id'  => $from_chat_id,
            'message_id'    => $message_id
        ];

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * Method for delete message from chat
     *
     * @param     chat_id integer | id chat where you want delete message
     * @param     message_id integer | id message what you want delete
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function deleteMessage($chat_id, $message_id)
    {
        $typeMethod = 'deleteMessage';

        $params = [
            'chat_id'       => $chat_id,
            'message_id'    => $message_id
        ];

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * Method for send photo in chat
     *
     * @param     chat_id integer | id chat where you want send photo
     * @param     path string | path to photo what you want send
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function sendPhoto($chat_id, $path)
    {
        $typeMethod = 'sendPhoto';

        $params = [
            'chat_id'   => $chat_id,
            'photo'     => $path,
        ];

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * Method for send video in chat // TODO: method don`t work now
     *
     * @param     chat_id integer | id chat where you want send video
     * @param     path string | path to video what you want send
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function sendVideo($chat_id, $path)
    {
        $typeMethod = 'sendVideo';

        $params = [
            'chat_id'  => $chat_id,
            'video'    => $path,
        ];

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * Function for sending telegram messages by bot
     *  customer params send
     *
     * @param     params array | array with field to send message
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function sendMessageParams($params)
    {
        $typeMethod = 'sendMessage';

        $result = $this->methodType($typeMethod, $params);

        return  $result;
    }

    /**
     * Function for answer callback query
     *
     * @param     params array | array with field to send callback
     *  Params can be this array:
     *
     *  $params = [
     *     'callback_query_id'     => $callback_id, // id callback for answer
     *      'text'                  => $answer // text answer
     *   ];
     *
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function answerCallbackQuery($params)
    {
        $typeMethod = 'answerCallbackQuery';

        $result = $this->methodType($typeMethod, $params);

        return $result;
    }
    
    
    /**
     * The function sends any method to the telegram for processing
     *
     * @param    typeMethod string
     * @param    params array with params for Telegram API
     * @return    result json result from Telegram API
     * @author    Andrii_Unhurian
     */
    public function methodType($typeMethod = 'sendMessage', $params)
    {
        $baseURL = $this->base_url . $this->token .'/';
        $baseURL .= $typeMethod;

        $url = $baseURL. '?'. http_build_query($params);

        $result = $this->curlQuery($url);
        return $result;
    }

    /**
     * Function for answer callback query || maybe, no effective
     *
     * @param     params array | array with field to send callback for inline click
     * @return    result json from Telegram API
     * @author    Andrii_Unhurian
     */
    public function answerInlineQuery($params)
    {
        $typeMethod = 'answerInlineQuery';

        $result = $this->methodType($typeMethod, $params);

        return $result;
    }



}
