<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionParticipant extends Model
{
    // for creating/updating records in db
    protected $fillable = ['name', 'surname', 'phoneNumber', 'email', 'receiptNumber', 'purchaseDate', 'receiptPhoto', 'statuteAcceptance', 'consentMarketingAcceptance'];

    use HasFactory;
}
