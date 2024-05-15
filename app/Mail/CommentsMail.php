<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user_name,$comments,$author_name;

    /**
     * Create a new message instance.
     */
    public function __construct($user_name,$comment,$author_name)
    {
        $this->user_name=$user_name;
$this->comments=$comment;
$this->author_name=$author_name;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comments Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    

    public function build()
    {
      //  $mailtemplate = Mailtemplate::where([['name', 'job_completed_writer'], ['status', 'active']])->first();

        $subject ="Mail From Blogs";
       // $mail_content = $mailtemplate->mail_content;
        //dd($this->writer_user->name);
        $mail_content = "Hi  <b>" . $this->author_name . "</b> </br>
       
        <b>" . $this->user_name . "</b> Commented on your blogs ".
        "Comments: " . $this->comments . " <br>";
      //$from="noreply@medagghealthcare.org";


        return $this->markdown('emails.mailcontent')
          
            ->subject($subject)
            ->with([
                'content' => $mail_content,
            ]);



    }
}
