<?php

namespace App\Domain\Dtos;

class CreateNoticeDTO {
    public string $title;
    public string $pdfName;
    public string $link;
    public function __construct(
        string $title,
        string $pdfName,
        string $link,
    ) {
        $this->title = $title;
        $this->pdfName = $pdfName;
        $this->link = $link;
    }
}