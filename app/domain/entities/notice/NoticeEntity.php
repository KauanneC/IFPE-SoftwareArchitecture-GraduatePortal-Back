<?php

namespace App\Domain\Entities\Notice;

use Ramsey\Uuid\Uuid;

class NoticeEntity {
    private string $id;
    private string $title;
    private string $pdfName;
    private string $link;

    public function __construct(
        string $title,
        string $pdfName,
        string $link,
        string $id = '',
    ) {
        $this->id = $id == '' ? Uuid::uuid4()->toString() : $id;
        $this->title = $title;
        $this->pdfName = $pdfName;
        $this->link = $link;
    }

    public function getId(): string {
        return $this->id;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle(string $title): void {
        $this->title = $title;
    }
    public function getPdfName(): string {
        return $this->pdfName;
    }
    public function setPdfName(string $pdfName): void {
        $this->pdf = $pdfName;
    }
    public function getLink(): string {
        return $this->link;
    }
    public function setLink(string $link): void {
        $this->link = $link;
    }
}