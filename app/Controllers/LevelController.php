<?php
namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LevelModel;
use App\Models\ProfileModel;

class LevelController extends BaseController
{

    function getlevels()
    {
        $course_id = $this->request->getPost('get_level');
        return redirect()->to(base_url() . 'levels/' . $course_id);
    }

    public function levels($course_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {

            $uri = current_url(true);
            $course_id = $uri->getSegment(2);

            $profile = new ProfileModel();
            $user_id = session()->get('user_id');
            $getlevels = new LevelModel();

            $data['levels'] = $getlevels->LevelDetails($course_id);
            $data['courses'] = $getlevels->CourseDetails($course_id);
            $data['progress'] = $getlevels->CompletedLevelsCount($course_id, $user_id);
            $data['completed'] = $getlevels->CompletedLevels($course_id);
            $data['ongoing'] = $getlevels->OngoingLevels($course_id);

            return view('main/levels', $data);
        }
    }

    function getcontent()
    {
        $level_id = $this->request->getPost('get_content');
        return redirect()->to(base_url() . 'level_content/' . $level_id);
    }


    public function level_content($level_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {

            $uri = current_url(true);
            $level_id = $uri->getSegment(2);

            $getlevelcontent = new LevelModel();
            $data['levels'] = $getlevelcontent->LevelDetails($level_id);

            return view('main/level_content', $data);
        }
    }
}
