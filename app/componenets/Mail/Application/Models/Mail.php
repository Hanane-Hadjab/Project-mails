<?php

namespace App\componenets\Mail\Application\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

class Mail extends Model
{
    use SoftDeletes;

    protected $table = 'mails';

    protected $fillable = [
        'content',
        'object',
        'send_to'
    ];

    protected $dates = [
      'created_at',
        'updated_at',
        'deleted_at',
    ];

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function sendBy()
    {
        return $this->belongsTo(User::class, 'send_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * une reponse appartien a un seul mail
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'response_id');
    }

    /**
     * un mail peut avoir plusieus réponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(self::class, 'response_id');
    }

    // -------------------------------------------------------------------------
    // Setters
    // -------------------------------------------------------------------------

    public function setSendTo(string $send_to): void
    {
        $this->send_to = $send_to;
    }

    public function setSendBy($user): void
    {
        $this->sendBy()->associate($user);
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setParent($response)
    {
        return $this->parent()->associate($response);
    }

    // -------------------------------------------------------------------------
    // Getters
    // -------------------------------------------------------------------------

    public function getId()
    {
        return $this->id;
    }
    public function getSendTo(): string
    {
        return $this->send_to;
    }

    public function getSendBy(): ?User
    {
        return $this->sendBy()->first();
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getParent()
    {
        return $this->parent()->first();
    }
    public function getResponses()
    {
        return $this->responses()->get();
    }
}
