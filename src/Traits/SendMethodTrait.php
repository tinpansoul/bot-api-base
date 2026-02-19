<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDiceMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendGameMethod;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendPollMethod;
use TgBotApi\BotApiBase\Method\SendStickerMethod;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait SendMethodTrait.
 */
trait SendMethodTrait
{
    /**
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    abstract public function sendMediaGroup(SendMediaGroupMethod $sendMediaGroupMethod): array;

    /**
     * @throws ResponseException
     */
    abstract public function send(SendMethodAliasInterface $sendMethodAlias): MessageType;

    /**
     * @throws ResponseException
     */
    abstract public function sendChatAction(SendChatActionMethod $sendChatActionMethod): bool;

    /**
     * @throws ResponseException
     */
    public function sendPhoto(SendPhotoMethod $sendPhotoMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendPhotoMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendAudio(SendAudioMethod $sendAudioMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendAudioMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendDocument(SendDocumentMethod $sendDocumentMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendDocumentMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendVideo(SendVideoMethod $sendVideoMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendVideoMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendAnimation(SendAnimationMethod $sendAnimationMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendAnimationMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendVoice(SendVoiceMethod $sendVoiceMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendVoiceMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendVideoNote(SendVideoNoteMethod $sendVideoNoteMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendVideoNoteMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendGame(SendGameMethod $sendGameMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendGameMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendInvoice(SendInvoiceMethod $sendInvoiceMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendInvoiceMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendLocation(SendLocationMethod $sendLocationMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendLocationMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendVenue(SendVenueMethod $sendVenueMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendVenueMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendContact(SendContactMethod $sendContactMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendContactMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendDice(SendDiceMethod $sendDiceMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendDiceMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendSticker(SendStickerMethod $sendStickerMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendStickerMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendMessage(SendMessageMethod $sendMessageMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendMessageMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendPoll(SendPollMethod $sendPollMethod): MessageType
    {
        return $this->send(sendMethodAlias: $sendPollMethod);
    }
}
