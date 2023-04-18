<?php

declare(strict_types=1);

namespace App\Http\Actions\Media;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class FileAction extends Controller
{
    public function __invoke(string $name, Request $request): StreamedResponse
    {
        if (!$request->hasValidSignature()) {
            throw new HttpException(401, 'Нет доступа к файлу');
        }

        $media = Media::where(['uuid' => $name])->firstOrFail();

        return Storage::disk('s3')->response(
            $media->id . '/' . $media->file_name,
            $media->name
        );
    }
}
