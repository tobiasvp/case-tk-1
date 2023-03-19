<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Gambar extends Model
{
    protected $table = "video";
 
    protected $fillable = ['file','name'];
}