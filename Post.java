import java.net.*;
import java.io.*;
import java.nio.*;
import java.lang.*;

public class Post {

	public static void main(String[] args) {
		try {
		String urlParameters = "uuid=ABC123&modid=vanilla&file=Pig&data={\n\t\"id\": \"Pig\"\n}";
		URL url = new URL("http://thetemportalist.dries007.net/datacore.php");
		URLConnection conn = url.openConnection();

		conn.setDoOutput(true);

		OutputStreamWriter writer = new OutputStreamWriter(conn.getOutputStream());

		writer.write(urlParameters);
		writer.flush();
		writer.close();
		
		String line;
		BufferedReader reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));

		while ((line = reader.readLine()) != null) {
			System.out.println(line);
		}
		reader.close();
		
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}
