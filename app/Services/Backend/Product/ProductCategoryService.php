<?php

namespace App\Services\Backend\Product;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Collection;

class ProductCategoryService
{
   const SWW = 'Something went wrong!';

    public function getCategories(): Collection
    {
        try {
            return ProductCategory::with(['createdBy:id,name'])
                ->select('id', 'image', 'name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeCategory(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 500, 'product_category_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            ProductCategory::create($data);
            return "Category has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCategory(array $data, ProductCategory $product_category): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($product_category->image);
                $image = uploadImage($data['image'], 400, 500, 'product_category_');
            } else {
                $image = $product_category->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $product_category->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyCategory(ProductCategory $product_category): string
    {
        try {
            if ($product_category->image) {
                deleteImage($product_category->image);
            }
            $product_category->delete();
            return "Deleted succesfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ProductCategory $product_category): string
    {
        try {
            $product_category->update(['is_active' => !$product_category->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function activeCategories(): Collection
    {
         try {
            return ProductCategory::where('is_active', true)->select('id', 'name')->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
