<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Engin;


class supprimer_fiche extends Controller
{
    public function supprimerclient($id)
    { {
            Client::where('id_client', $id)->delete();
            return redirect('/clients');
        }
    }
    public function supprimerengin($id)
    { {
            Engin::where('id_engins', $id)->delete();
            return redirect('/engins');
        }
    }
}
