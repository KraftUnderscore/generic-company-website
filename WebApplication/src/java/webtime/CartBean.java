package webtime;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class CartBean {
    public List<ProductBean> cartProducts;

    public CartBean() {}
    
    public List<ProductBean> getCartProducts() {
        return cartProducts;
    }

    public void setCartProducts(List<ProductBean> cartProducts) {
        this.cartProducts = cartProducts;
    }    
}
