<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Item;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','admin_id'
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザがカートに入れたアイテム。（ Userモデルとの関係を定義）
     */
    public function carts()
    {
        return $this->belongsToMany(Item::class, 'carts', 'user_id', 'item_id')->withTimestamps();
    }
    
    /**
     * $userIdで指定されたアイテムをカートに入れる。
     *
     * @param  int  $userId
     * @return bool
     */
    public function cart($itemId)
    {
        // すでにカートに入れているか
        $exist = $this->is_cart($itemId);
        
        //カートに入れる
        $this->carts()->attach($itemId, ['quantity' => 1]);
        return true;
    }
    
    /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function uncart($itemId)
    {
        // すでにカートに入れているか
        $exist = $this->is_cart($itemId);
        
        if ($exist) {
            // カートに入れ済みの場合はカートから外す
            $this->carts()->detach($itemId);
            return true;
        } else {
            // 上記以外の場合は何もしない
            return false;
        }
    }
    
    /**
     * 指定された $userIdのアイテムをこのユーザがカートに入れてあるか調べる。カートに入っていたらtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_cart($itemId)
    {
        // カートに入れたアイテムの中に $userIdのものが存在するか
        return $this->carts()->where('item_id', $itemId)->exists();
    }
    
    /**
     * このカートに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('carts');
    }
}