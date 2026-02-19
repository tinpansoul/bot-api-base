<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\SetPassportDataErrorsMethod;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorDataFieldType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFilesType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFileType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFrontSideType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorReverseSideType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorSelfieType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorTranslationFilesType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorTranslationFileType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorUnspecifiedType;

final class SetPassportDataErrorsMethodTest extends MethodTestCase
{
    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorDataField(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'personal_details',
                'message' => 'message',
                'field_name' => 'fieldName',
                'data_hash' => 'hash',
                'source' => 'data',
            ],
            passportElementErrorType: PassportElementErrorDataFieldType::create(
                type: PassportElementErrorDataFieldType::TYPE_PERSONAL_DETAILS,
                message: 'message',
                fieldName: 'fieldName',
                dataHash: 'hash'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFilesType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hashes' => ['hash1', 'hash2'],
                'source' => 'files',
            ],
            passportElementErrorType: PassportElementErrorFilesType::create(
                type: PassportElementErrorFilesType::TYPE_UTILITY_BILL,
                message: 'message',
                fileHashes: ['hash1', 'hash2']
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFileType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hash' => 'hash1',
                'source' => 'file',
            ],
            passportElementErrorType: PassportElementErrorFileType::create(
                type: PassportElementErrorFileType::TYPE_UTILITY_BILL,
                message: 'message',
                fileHash: 'hash1'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFrontSideType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'internal_passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'front_side',
            ],
            passportElementErrorType: PassportElementErrorFrontSideType::create(
                type: PassportElementErrorFrontSideType::TYPE_INTERNAL_PASSPORT,
                message: 'message',
                fileHash: 'hash'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorReverseSideType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'identity_card',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'reverse_side',
            ],
            passportElementErrorType: PassportElementErrorReverseSideType::create(
                type: PassportElementErrorReverseSideType::TYPE_IDENTITY_CARD,
                message: 'message',
                fileHash: 'hash'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorSelfieType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'selfie',
            ],
            passportElementErrorType: PassportElementErrorSelfieType::create(
                type: PassportElementErrorSelfieType::TYPE_PASSPORT,
                message: 'message',
                fileHash: 'hash'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorTranslationFilesType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hashes' => ['hash1', 'hash2'],
                'source' => 'translation_files',
            ],
            passportElementErrorType: PassportElementErrorTranslationFilesType::create(
                type: PassportElementErrorTranslationFilesType::TYPE_UTILITY_BILL,
                message: 'message',
                fileHashes: ['hash1', 'hash2']
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorTranslationFileType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'translation_file',
            ],
            passportElementErrorType: PassportElementErrorTranslationFileType::create(
                type: PassportElementErrorTranslationFileType::TYPE_PASSPORT,
                message: 'message',
                fileHash: 'hash'
            )
        );
    }

    /**
     * @throws BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorUnspecifiedType(): void
    {
        $this->runWithArguments(
            excepted: [
                'type' => 'internal_passport',
                'message' => 'message',
                'element_hash' => 'hash',
                'source' => 'unspecified',
            ],
            passportElementErrorType: PassportElementErrorUnspecifiedType::create(
                type: PassportElementErrorUnspecifiedType::TYPE_INTERNAL_PASSPORT,
                message: 'message',
                elementHash: 'hash'
            )
        );
    }

    public function testElementErrorType(): void
    {
        $this->expectException(exception: BadArgumentException::class);
        PassportElementErrorTranslationFileType::create(
            type: 'wrong_type',
            message: 'message',
            fileHash: 'hash'
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, string>|array<string, string[]> $excepted
     */
    public function runWithArguments(array $excepted, PassportElementErrorType $passportElementErrorType): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setPassportDataErrors',
            request: [
                'user_id' => 1,
                'errors' => [
                    $excepted,
                ],
            ],
            result: true
        );

        $botApiComplete->setPassportDataErrors(
            setPassportDataErrorsMethod: SetPassportDataErrorsMethod::create(
            userId: 1,
            errors: [
                $passportElementErrorType,
            ]
        ));
    }
}
