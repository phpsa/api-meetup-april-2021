<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Hash;

trait HasPassword
{
    /**
     * Check if the password is already hashed
     *
     * @param string $password
     *
     * @return bool
     */
    protected function isPasswordHashed(string $password): bool
    {
        return \strlen($password) === 60 && preg_match('/^\$2[a-z]\$/', $password);
    }

    /**
     * Sets the password attribute, hashign if not hashed
     *
     * @param string $password
     *
     * @return void
     */
    public function setPasswordAttribute(string $password): void
    {
        $hash = $this->isPasswordHashed($password) ? $password : Hash::make($password);
        $this->attributes[$this->getPasswordColumn()] = $hash;
    }

    /**
     * validates the current password
     *
     * @param string $clearText
     *
     * @return bool
     */
    public function validatePassword(string $clearText): bool
    {
        return Hash::check($clearText, $this->getPasswordColumn());
    }

    public function getPasswordColumn()
    {
        return defined('static::PASSWORD_COLUMN') ? static::PASSWORD_COLUMN : 'password';
    }
}
