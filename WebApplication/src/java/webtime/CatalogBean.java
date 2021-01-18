package webtime;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.RequestScoped;
import javax.faces.bean.ViewScoped;

@ManagedBean
@ViewScoped
public class CatalogBean implements Serializable {
    
    private String selectedCategory = "cat_all";
    private List<ProductBean> products;

    private List<ProductBean> filteredProducts;
    private List<String> selectedProducts;

    @ManagedProperty("#{cartBean}")
    private CartBean cart;

    
    public CatalogBean(){
        initCatalog();
    }
    
    public CatalogBean(String selectedCategory) {
        this.selectedCategory = selectedCategory;
        initCatalog();
    }
        
    private void initCatalog() {
        products = new ArrayList<>();
        
        products.add(new ProductBean("Komputer 2000", "cat_devices", 3400.41f));
        products.add(new ProductBean("Laptop 2500", "cat_devices", 4300.53f));
        products.add(new ProductBean("Naprawa komputera", "cat_services", 49.99f));
        products.add(new ProductBean("Czyszczenie dysku", "cat_services", 25.99f));
        products.add(new ProductBean("SpotiFive", "cat_software", 399.49f));
        products.add(new ProductBean("NetInBeans", "cat_software", 15.99f));
        products.add(new ProductBean("Ścierka do monitora", "cat_products", 9.99f));
        products.add(new ProductBean("Sprężone powietrze", "cat_products", 19.99f));
        
        filteredProducts = products;
    }

    public void addSelected() {
        selectedProducts.forEach(name ->{
            ProductBean prod = null;
            for(ProductBean product : products) {
                if(product.name.equals(name)) {
                    prod = product;
                    break;
                }
            }
            if(!cart.cartProducts.contains(prod)) {
                cart.cartProducts.add(prod);
            }
        });
    }
    
    public void removeSelected() {
        selectedProducts.forEach(name ->{
            ProductBean prod = null;
            for(ProductBean product : products) {
                if(product.name.equals(name)) {
                    prod = product;
                    break;
                }
            }
            if(cart.cartProducts.contains(prod)) {
                cart.cartProducts.remove(cart.cartProducts.indexOf(prod));
            }
        });
    }
    
    public void filter() {
        if(selectedCategory.equals("cat_all")) {
            filteredProducts = products;
            return;
        }
        filteredProducts = new ArrayList<>();
        
        products.stream().filter(product -> (product.category.equals(selectedCategory))).forEachOrdered(product -> {
            filteredProducts.add(product);
        });
    }
    
    public List<ProductBean> getFilteredProducts() {
        return filteredProducts;
    }
    
    public List<String> getFilteredProductsLabels() {
        List<String> labels = new ArrayList<>();
        
        products.forEach(product -> {
            labels.add("Nazwa: " + product.name + " Cena: " + product.price);
        });
        
        return labels;
    }
        
    public List<String> getFilteredProductsValues() {
        List<String> names = new ArrayList<>();
        
        products.forEach(product -> {
            names.add(product.name);
        });
        
        return names;
    }
    
    public List<ProductBean> getProducts() {
        return products;
    }
     
    public List<ProductBean> getProductsFromCategory(String category) {
        List<ProductBean> output = new ArrayList<>();
        products.forEach(product -> {
            if(product.category.equals(category)) {
                output.add(product);
            }
        });
        return output;
    }
    
    public CartBean getCart() {
        return cart;
    }

    public void setCart(CartBean cart) {
        this.cart = cart;
    }
    
    public String getSelectedCategory() {
        return selectedCategory;
    }

    public void setSelectedCategory(String selectedCategory) {
        this.selectedCategory = selectedCategory;
    }
    
    public List<String> getSelectedProducts() {
        return selectedProducts;
    }

    public void setSelectedProducts(List<String> selectedProducts) {
        this.selectedProducts = selectedProducts;
    }
}
