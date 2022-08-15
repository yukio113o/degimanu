<?php

namespace App\Http\Responders;

use Illuminate\Http\RedirectResponse;

trait RedirectPreviousTrait
{
    /**
     * @return RedirectResponse
     */
    private function redirectToPrevious(): RedirectResponse
    {
        return $this->response->redirectTo($this->generator->previous());
    }

    /**
     * @return RedirectResponse
     */
    private function redirectToPreviousWithInput(): RedirectResponse
    {
        return $this->redirectToPrevious()->withInput();
    }
}
