<?php

namespace App\Http\Controllers;
use App\Domain\Dtos\CreateNoticeDTO;
use App\Domain\UseCases\Notice\CreateNoticeUserCase;
use App\Http\Requests\CreateNoticeRequest;
use App\Http\ViewModel\NoticeViewModel;
use Illuminate\Support\Facades\Log;

class NoticeController extends Controller {
    public function __construct(
        private CreateNoticeUserCase $createNoticeUserCase,
    ){}

    public function create(CreateNoticeRequest $request){
        try {
            $requestData = $request->only(['title', 'pdfName', 'link']);

            $notice = $this->createNoticeUserCase->execute(new CreateNoticeDTO(
                $requestData['title'],
                $requestData['pdfName'],
                $requestData['link'],
            ));

            Log::info('Notícia criada com sucesso');

            $noticeResult = NoticeViewModel::toHttpCreate($notice);

            return response()->json($noticeResult, 201);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['message' => 'Erro ao criar notícia'], 400);
        }
    }
}