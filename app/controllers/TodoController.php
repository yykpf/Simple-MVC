<?php
namespace app\controllers;

use app\models\Todo;

class TodoController extends BaseController
{

    // 展示全部
    public function index()
    {
        $todo = Todo::all();
        $this->render('todo/index',['todos'=>$todo]);
    }

    // 添加
    public function store()
    {
        $toDo = new Todo();
        $toDo->title = $_POST['title'];
        $toDo->status = false;
        $toDo->save();
        return $this->redirect('todo/index');
    }

    //编辑
    public function edit($id)
    {
        $toDo = Todo::byId($id);
        $toDo->status = true;
        $toDo->save();
        return $this->redirect('todo/index');
    }

    //删除
    public function destroy($id)
    {
        $toDo = Todo::byId($id);
        $toDo->delete($id);
        return $this->redirect('todo/index');
    }
}