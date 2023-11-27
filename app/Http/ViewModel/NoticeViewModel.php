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

    public static function toHttpGetAll(array $notices): array {
        $noticesViewModel = [];
        foreach($notices as $notice){
            $noticesViewModel[] = [
                'id' => $notice['_id'],
                'title' => $notice['title'],
                'pdfName' => $notice['pdf_name'],
                'link' => $notice['link'],
            ];
        }
        return $noticesViewModel;
    }
}