<?php
/**
 * @author ps <786188095@qq.com>
 * @title
 *
 */
namespace App\Repositories;

use Image;
class ProjectsRepository {

    public function newProject($request) {
        $user = $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumbnail($request)
        ]);
        if (!empty($user)) {
            return true;
        }
        return false;
    }

    public function thumbnail($request) {

        if ($request->hasFile('thumbnail')) {
            $files = $request->thumbnail;
            $name = str_random(10).'.jpg';
            $path = public_path().'/thumbnail/'.$name;
            Image::make($files)->resize(261,98)->save($path);

            return $name;
        }
    }


}