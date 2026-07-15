<?php

namespace App\Services\Backend\CMS;

use App\Models\Client;
use App\Models\Pages\PageClient;
use Carbon\Carbon;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ClientService
{
    const SWW = 'Something went wrong!';

    public function getClients(): Collection
    {
        try {
            return Client::with(['createdBy:id,name'])
                ->select('id', 'image', 'alt_name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeClient(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 350, 165, 'client_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            Client::create($data);
            return "New client has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateClient(array $data, Client $client): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($client->image);
                $image = uploadImage($data['image'], 350, 165, 'client_');
            } else {
                $image = $client->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $client->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyClient(Client $client): string
    {
        try {
            if ($client->image) {
                deleteImage($client->image);
            }
            $client->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Client $client): string
    {
        try {
            $client->update(['is_active' => !$client->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    // client page
    public function getClientPageContent(): ?PageClient
    {
        try {
            return PageClient::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords', 'section_title', 'section_description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageClient $client): string
    {
        try {
            if (isset($data['image'])) {
                if ($client->image) {
                    deleteImage($client->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $client->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageClient::updateOrCreate([
                'id' => $client->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'section_title' => $data['section_title'],
                'section_description' => $data['section_description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
