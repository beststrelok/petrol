<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FeedbackController extends Controller {
	public function admin_feedbacks() {
		$feedbacks = Feedback::all();
		return v()->with(compact('feedbacks'));
	}

	public function delete_feedback() {
		$feedback_id = Request::input('feedback_id');
		$feedback = ${ucfirst('feedback')}::find($feedback_id);
		$feedback->delete();
		return redirect()->back()->with('message', "Отзыв \"{$feedback->title}\" #{$feedback->feedback_id} удален успешно!");
	}

	public function feedback() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('feedback')}::create($data);

		Mail::send('emails.feedback', $data, function ($mail) use ($data) {
			$mail->to($data['email'], $data['name'])->subject('');
		});

		return redirect()->back()->with('message', 'Спасибо. Ваш сообщение принято.');
	}
}