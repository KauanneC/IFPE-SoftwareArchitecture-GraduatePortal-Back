<?php

namespace App\Http\ViewModel;
use App\Domain\Entities\Notice\NoticeEntity;

class NoticeViewModel {
    public static function toHttpCreate(NoticeEntity $noticeEntity): array {
        return [
            'id' => $noticeEntity->getId(),
            'title' => $noticeEntity->getTitle(),
            'pdfName' => $noticeEntity->getPdfName(),
            'link' => $noticeEntity->getLink(),
        ];
    }
}