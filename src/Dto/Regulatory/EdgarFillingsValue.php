<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type EdgarFillingsValueFileType from EdgarFillingsValueFile
 * @phpstan-type EdgarFillingsValueType array{
 *     cik: int,
 *     filed_at: int,
 *     form_type: string,
 *     files: list<EdgarFillingsValueFileType>,
 *     filing_url: string
 * }
 */
readonly class EdgarFillingsValue
{
    /** @param list<EdgarFillingsValueFile> $files */
    public function __construct(
        public int $cik,
        public int $filedAt,
        public string $formType,
        public array $files,
        public string $filingUrl,
    ) {
    }

    /** @param EdgarFillingsValueType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cik: $data['cik'],
            filedAt: $data['filed_at'],
            formType: $data['form_type'],
            files: array_map(
                static fn (array $file): EdgarFillingsValueFile => EdgarFillingsValueFile::fromArray($file),
                $data['files'],
            ),
            filingUrl: $data['filing_url'],
        );
    }
}
