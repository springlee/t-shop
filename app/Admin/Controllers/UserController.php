<?php

namespace App\Admin\Controllers;

use App\Model\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户列表');
            $content->description('');

            $content->breadcrumb(
                ['text' => '用户管理', 'url' => '/user/users'],
                ['text' => '用户列表']
            );

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑用户');
            $content->description('');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新增用户');
            $content->description('');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('编号')->sortable();
            $grid->username('用户名');
            $grid->email('邮箱');
            $grid->tel('手机号');
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('最后更新时间')->sortable();
            $grid->last_login('最后登陆时间')->sortable();

            $grid->model()->orderBy('id', 'desc');
            // $grid->model()->
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('username', '用户名')->rules('required');;
            $form->text('email', '邮箱')->rules('required|email');;
            $form->mobile('tel', '手机号');
            $form->password('password', '密码');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '最后更新时间');
        });
    }
}
