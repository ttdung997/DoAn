<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function model();

    public function setModel()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model
            ->select($dataSelect)
            ->with($with)
            ->where($data)
            ->orderBy($attribute[0], $attribute[1])
            ->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($id, $data)
    {
        $model = $this->findById($id);

        return $model->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function saveFile($currentFile, $newFile, $path, $width, $height)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }

        $filename = time() . '_' . str_slug($newFile->getClientOriginalName()) . '.' . $newFile->getClientOriginalExtension();

        $file_path = public_path($path . $filename);

        ResizeImage::make($newFile->getRealPath())->resize($width, $height)->save($file_path);

        return $filename;
    }

    public function create($data)
    {
        $model = $this->model->create($data);

        return $model;
    }

    public function slug($str)
    {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);

        return $str;
    }

    public function updateOrCreate($filter, $data)
    {
        return $this->model->updateOrCreate($filter, $data);
    }
}
