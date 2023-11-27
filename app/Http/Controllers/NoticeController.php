<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\CreateNoticeRequest;
use App\Domain\Dtos\CreateNoticeDTO;

use App\Domain\UseCases\Notice\CreateNoticeUserCase;
use App\Domain\UseCases\Notice\GetAllNoticeUseCase;
use App\Domain\UseCases\Notice\RemoveNoticeUseCase;

use App\Http\ViewModel\NoticeViewModel;

class NoticeController extends Controller {
    public function __construct(
        private CreateNoticeUserCase $createNoticeUserCase,
        private GetAllNoticeUseCase $getAllNoticeUseCase,
        private RemoveNoticeUseCase $removeNoticeUseCase
    ){}

    public function create(CreateNoticeRequest $request){
        try {
            $requestData = $request->only(['title', 'pdfName', 'link']);

            $notice = $this->createNoticeUserCase->execute(new CreateNoticeDTO(
                $requestData['title'],
                $requestData['pdfName'],
                $requestData['link'],
            ));

            Log::info('Edital criado com sucesso');

            $noticeResult = NoticeViewModel::toHttpCreate($notice);

            return response()->json($noticeResult, 201);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Erro ao criar edital'], 400);
        }
    }

    public function getAll(){
        try {
            $notices = $this->getAllNoticeUseCase->execute();

            Log::info('Editais retornados com sucesso');

            $noticesResult = NoticeViewModel::toHttpGetAll($notices);

            return response()->json($noticesResult, 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Erro ao retornar editais'], 404);
        }
    }

    public function remove(string $id){
        try {
            $this->removeNoticeUseCase->execute($id);

            Log::info('Edital removido com sucesso');

            return response()->json(['msg' => 'Edital removido com sucesso'], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Erro ao remover edital'], 400);
        }
    }
}