package webtime;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class ShipmentBean {
    String shipment_name;
    float shipment_prize;
    
    public ShipmentBean(){
    }

    public ShipmentBean(String shipment_name, float shipment_prize) {
        this.shipment_name = shipment_name;
        this.shipment_prize = shipment_prize;
    }

    public String getShipment_name() {
        return shipment_name;
    }

    public void setShipment_name(String shipment_name) {
        this.shipment_name = shipment_name;
    }

    public float getShipment_prize() {
        return shipment_prize;
    }

    public void setShipment_prize(float shipment_prize) {
        this.shipment_prize = shipment_prize;
    }
    
    
    
}
