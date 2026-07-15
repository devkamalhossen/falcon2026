<?php

namespace App\Services\Backend\Product;

use App\Models\Product;
use Exception;
use Illuminate\Support\Collection;

class ProductService
{
    const SWW = 'Something went wrong!';

    public function getProducts(): Collection
    {
        try {
            return Product::with(['createdBy:id,name', 'category:id,name'])
                ->select('id', 'product_category_id', 'datasheet', 'name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeProduct(array $data): string
    {
        try {
            if (isset($data['datasheet'])) {
                $datasheet = uploadFile($data['datasheet'], 'product_datasheet_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['datasheet'] = $datasheet ?? null;

            Product::create($data);
            return "Product has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateProduct(array $data, Product $product): string
    {
       
        try {
             if (isset($data['datasheet'])) {
                deleteImage($product->datasheet);
                $datasheet = uploadFile($data['datasheet'], 'product_datasheet_');
            } else {
                $datasheet = $product->datasheet;
            }
           
            $data['datasheet'] = $datasheet;
            $data['created_by'] = auth('admin')->user()->id;
            $product->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyProduct(Product $product): string
    {
        try {
             if ($product->datasheet) {
                deleteImage($product->datasheet);
            }
            $product->delete();
            return "Deleted succesfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Product $product): string
    {
        try {
            $product->update(['is_active' => !$product->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
