<?php

/**
 * The Contact Controller.
 * 
 * @package  app
 * @extends  Controller_Base
 */
class Controller_Contact extends Controller_Base {
  public function before() {
		parent::before();
  }

  public function after() {
		parent::after();
    $this->_view->contentClass = 'content';
  }

  public function action_index() {
    $this->_view->pageTitle = 'Contact';

    if (Input::method() == 'POST') {
      $val = Validation::factory();

      $val->add('name', 'Your Name')
				->add_rule('required')
				->add_rule('valid_string', array('alpha', 'punctuation', 'spaces'));
      $val->add('email', 'Your Email')
				->add_rule('required')
				->add_rule('valid_email');
      $val->add('phone', 'Your Phone')
				->add_rule('required')
				->add_rule('valid_string', array('numeric', 'dots', 'dashes', 'spaces'))
				->add_rule('min_length', 10);
      $val->add('howHeard', 'How Heard')->add_rule('required');
      $val->add('details', 'Details')->add_rule('required');

			$val->set_message('valid_string', 'The field :label must be valid');

      if ($val->run()) {
				$to = 'tyler.a.schwartz@gmail.com';
				$subject = 'Website Inquiry';
				$headers = 
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'From: Tara Noelle Photography <noreply@taranoellephotography.com>' . "\r\n" .
					'Reply-To: noreply@taranoellephotography.com' . "\r\n" .
					'X-Mailer: PHP/'.phpversion();
				$message = '
					<html>
						<head>
							<title>Tara Noelle Photography Website Inquiry</title>
							<style>
								.label { font-weight:bold; color:#444; }
							</style>
						</head>
						<body>
							<h2>You have received an inquiry from your website</h2>
							<table>
								<tr>
									<td class="label">Name:</td>
									<td>'.Input::post('name').'<td>
								</tr>
								<tr>
									<td class="label">Email:</td>
									<td>'.Input::post('email').'<td>
								</tr>
								<tr>
									<td class="label">Phone Number:</td>
									<td>'.Input::post('phone').'<td>
								</tr>
								<tr>
									<td class="label" valign="top">How they heard:</td>
									<td>'.Input::post('howHeard').'<td>
								</tr>
								<tr>
									<td class="label" valign="top">Details:</td>
									<td>'.Input::post('details').'<td>
								</tr>
							</table>
						</body>
					</html>';

				if (@mail($to, $subject, $message, $headers)) {
					$this->_view->pageTitle = 'Success';
					$data['success'] = true;
				}
				else {
					$this->_view->pageTitle = 'Uh Oh...';
					$data['success'] = false;
				}

				$this->_view->content = View::factory('contact-post', $data);
      }
      else {
        $data['input'] = $val->input();
        $data['errors'] = $val->errors();

        $this->_view->content = View::factory('contact', $data);
      }
    }
    else {
      $this->_view->content = View::factory('contact');
    }
  }
}

/* End of file admin.php */
