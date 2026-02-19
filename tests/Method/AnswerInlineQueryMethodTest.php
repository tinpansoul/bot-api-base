<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InlineQueryResult\InlineQueryResultArticleType;
use TgBotApi\BotApiBase\Type\InlineQueryResult\InlineQueryResultAudioType;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputTextMessageContentType;

/**
 * Class AnswerInlineQueryMethodTest.
 *
 * @todo add all InlineQueryTypes
 */
final class AnswerInlineQueryMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testInlineQueryResultArticle(): void
    {
        [$exceptedMessageContent, $verifiableMessageContent] = $this->buildInputTextMessageContent();
        $this->runWithArguments(
            excepted: [
                'type' => 'article',
                'id' => 'id',
                'title' => 'title',
                'input_message_content' => $exceptedMessageContent,
                'reply_markup' => $this->buildInlineKeyboardButtonArray(),
                'url' => 'url',
                'hide_url' => true,
                'description' => 'description',
                'thumb_url' => 'thumb_url',
                'thumb_width' => 320,
                'thumb_height' => 320,
            ],
            verifiable: InlineQueryResultArticleType::create(
                id: 'id',
                title: 'title',
                inputMessageContentType: $verifiableMessageContent,
                data: [
                    'replyMarkup' => $this->buildInlineKeyboardButtonObject(),
                    'url' => 'url',
                    'hideUrl' => true,
                    'description' => 'description',
                    'thumbUrl' => 'thumb_url',
                    'thumbWidth' => 320,
                    'thumbHeight' => 320,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testInlineQueryResultAudio(): void
    {
        [$exceptedMessageContent, $verifiableMessageContent] = $this->buildInputTextMessageContent();
        $this->runWithArguments(
            excepted: [
                'type' => 'audio',
                'id' => 'id',
                'audio_url' => 'audio_url',
                'title' => 'title',
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'performer' => 'performer',
                'audio_duration' => 1,
                'reply_markup' => $this->buildInlineKeyboardButtonArray(),
                'input_message_content' => $exceptedMessageContent,
            ],
            verifiable: InlineQueryResultAudioType::create(
                id: 'id',
                audioUrl: 'audio_url',
                title: 'title',
                data: [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'performer' => 'performer',
                    'audioDuration' => 1,
                    'replyMarkup' => $this->buildInlineKeyboardButtonObject(),
                    'caption' => 'caption',
                    'inputMessageContent' => $verifiableMessageContent,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @return array<int, InputTextMessageContentType|array<string, bool|string>>
     */
    private function buildInputTextMessageContent(): array
    {
        return [
            [
                'message_text' => 'InputTextMessageContentType',
                'parse_mode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
            ],
            InputTextMessageContentType::create(
                messageText: 'InputTextMessageContentType',
                data: [
                    'parseMode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                ]
            ),
        ];
    }

    /**
     * @param $excepted
     * @param $verifiable
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     * @param array<string, mixed> $excepted
     */
    private function runWithArguments(array $excepted, InlineQueryResultArticleType|InlineQueryResultAudioType $verifiable): void
    {
        $dateTime = new \DateTimeImmutable();

        $botApiComplete = $this->getBot(methodName: 'answerInlineQuery', request: [
            'inline_query_id' => 'inline_query_id',
            'results' => [
                $excepted,
                $excepted,
            ],
            'cache_time' => $dateTime->format(format: 'U'),
            'is_personal' => true,
            'next_offset' => 'next_offset',
            'switch_pm_text' => 'switch_pm_text',
            'switch_pm_parameter' => 'switch_pm_parameter',
        ], result: true, serialisedFields: ['results']);

        $answerInlineQueryMethod = AnswerInlineQueryMethod::create(
            inlineQueryId: 'inline_query_id',
            results: [$verifiable],
            data: [
                'cacheTime' => $dateTime,
                'isPersonal' => true,
                'nextOffset' => 'next_offset',
                'switchPmText' => 'switch_pm_text',
                'switchPmParameter' => 'switch_pm_parameter',
            ]
        );

        $answerInlineQueryMethod->addResult(
            inlineQueryResultType: $verifiable
        );

        $botApiComplete->answerInlineQuery(answerInlineQueryMethod: $answerInlineQueryMethod);
    }
}
