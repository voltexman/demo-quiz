<?php
namespace app\models\admin;

use app\models\AppModel;

/**
 * @property int $id
 * @property string $title
 * @property string $url_video
 * @property integer $status
 */

class Job extends AppModel {


    const STATUS_ACTIVE =   1;
    const STATUS_DRAFT =    2;



    public $attributes = [
        'title' => '',
        'url_video' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['title'],
            ['url_video'],
            ['status'],
        ],
        'integer' => [
            ['status'],
        ],
        'lengthMin' => [
            ['title', 3],
        ],

    ];




    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_DRAFT => 'Не активный'
        ];
    }





    /**
     * @param $offset
     * @param $limit
     * @return array
     */
    public function getJobs($offset, $limit)
    {
        return \R::findAll( 'job' , 'WHERE status = 1 ORDER BY id DESC LIMIT ? OFFSET ?', [$limit, $offset]);
    }


    /**
     * @param $offset
     * @param $limit
     * @return bool
     */
    public function isShowLoadJobsBtn($offset, $limit)
    {
        return count(\R::findAll( 'job' , 'WHERE status = 1 ORDER BY id DESC LIMIT ? OFFSET ?', [$limit, $offset])) > 0;
    }




    public function getJobsViaAjax($offset, $limit){

        $out = '';
        $jobs = $this->getJobs($offset, $limit);
        $nextOffset = $offset + $limit;

        foreach ($jobs as $job){
            /** @var $jobs Job */
            $out .= '
                    <div class="col-md-6 col-12 last-work-item">
                        <a href="#" class="last-work-link '. 'last-work-link_'. $nextOffset . '"  data-video-id="'. $job->url_video .'">
                            <img src="http://i3.ytimg.com/vi/'. $job->url_video .'/maxresdefault.jpg" alt="'. $job->url_video .'">
                            <span class="play__wrapper">
                                <span class="play_icon_wrapper">
                                    <span class="play_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="41" viewBox="0 0 35 41"><defs><path id="rda0a" d="M1338.64 2568.26l-26.704-16.824c-.79-.47-1.77-.392-2.51-.392-2.961 0-2.948 2.287-2.948 2.866v34.387c0 .49-.013 2.866 2.948 2.866.74 0 1.721.078 2.51-.392l26.703-16.824c2.192-1.304 1.813-2.843 1.813-2.843s.379-1.54-1.813-2.843z"/></defs><g><g transform="translate(-1306 -2551)"><use fill="#fff" xlink:href="#rda0a"/></g></g></svg>
                                    </span>
                                </span>
                                <span class="play_text">
                                    '. h($job->title) .'
                                </span>
                            </span>
                        </a>
                    </div>
                ';
        }


        if ($this->isShowLoadJobsBtn($nextOffset, $limit)){
            $out .= '
                <div class="col-12 button_more_video_column" id="load-jobs-btn-wrap">
                    <button class="btn_transparent" data-offset="'. $nextOffset . '" id="load-jobs-btn">Показать еще</button>
                </div>
            ';
        }

        return $out;

    }






}