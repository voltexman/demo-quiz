<?php

namespace app\controllers\admin;

class MainController extends AdminController
{
    public function indexAction()
    {
        $countResults = \R::count('results');
        $countVisitors = \R::count('visitors');
//        $countEmployees = \R::count('employee');

        $results = \R::getAll("SELECT * FROM results WHERE status = 1 ORDER BY id DESC");
        $newResults = count($results);
        $calls = \R::getAll("SELECT * FROM calls WHERE status = 1 ORDER BY id DESC");
        $todayVisitors = count(\R::getAll("SELECT * FROM visitors WHERE date = ?", [date('Y-m-d')]));

        $os['linux'] = count(\R::getAll("SELECT * FROM visitors WHERE os = ?", ['GNU/Linux']));
        $os['windows'] = count(\R::getAll("SELECT * FROM visitors WHERE os = ?", ['Windows']));
        $os['android'] = count(\R::getAll("SELECT * FROM visitors WHERE os = ?", ['Android']));
        $os['ios'] = count(\R::getAll("SELECT * FROM visitors WHERE os = ?", ['iOS']));

        $device['desktop'] = count(\R::getAll("SELECT * FROM visitors WHERE device = ?", ['desktop']));
        $device['smartphone'] = count(\R::getAll("SELECT * FROM visitors WHERE device = ?", ['smartphone']));
        $device['tablet'] = count(\R::getAll("SELECT * FROM visitors WHERE device = ?", ['tablet']));

        $chrome = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['Chrome']));
        $chromeMobile = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['Chrome Mobile']));
        $safari = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['Safari']));
        $safariMobile  = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['Mobile Safari']));

        $browser['chrome'] = $chrome + $chromeMobile;
        $browser['ie'] = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['ie']));
        $browser['firefox'] = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['firefox']));
        $browser['safari'] = $safari + $safariMobile;
        $browser['opera'] = count(\R::getAll("SELECT * FROM visitors WHERE browser = ?", ['opera']));

        $statistics = \R::getAll("SELECT * FROM statistics ORDER BY date ASC LIMIT 30");
//        $statistics = [
//            'month' => [
//                'date' => ['22-07', '23-07'],
//                'count' => ['22', '24'],
//            ]];

        if ($countResults != 0 && $countVisitors != 0) {
            $conversion = ($countResults / $countVisitors) * 100;
        } else {
            $conversion = 0;
        }

        $this->setMeta('Панель управления');
        $this->setData(compact('countResults', 'countVisitors', 'todayVisitors', 'newResults', 'results',
            'calls', 'statistics', 'os', 'device', 'browser', 'conversion'));
    }

    public function fullResetStatisticsAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }

        \R::exec("DELETE FROM statistics");
        \R::exec("DELETE FROM visitors");
        redirect();
    }
}